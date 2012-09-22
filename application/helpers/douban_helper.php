<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('parse_douban_movie_to_array'))
{
    function parse_douban_movie_to_array($data) {
        $movie = array(
            'alias' => array(),
            'cast' => array(), // 主演
            'movie_type' => array(), // 影片类型
            'language' => array(), // 语言
            'duration' => array(), // 片长
            'tags' => array()
        );
        $movie['douban_id'] = $_GET['id']; // 在豆瓣所属的id
        $movie['rating'] = ''; // 评分
        $movie['summary'] = $data->summary->{'$t'};
        // 获取评分数据
        $movie['rating'] = $data->{'gd:rating'}->{'@average'};
        $movie['rating_numbers'] = $data->{'gd:rating'}->{'@numRaters'};
        foreach ($data->link as $k => $v) {
            if ($v->{'@rel'} == 'alternate') { //在豆瓣的地址
                $movie['douban_url'] = $v->{'@href'};
            }
            if ($v->{'@rel'} == 'image') { // 海报图片地址
                $movie['img'] = $data->link[2]->{'@href'};
            }
        }
        // 获取标签
        foreach($data->{'db:tag'} as $t) {
            array_push($movie['tags'], $t->{'@name'}.'_'.$t->{'@count'});
        }
        // 解析属性
        $db = $data->{'db:attribute'};
        foreach ($db as $m) {
            switch ($m->{'@name'}) {
                case 'director': // 导演
                    $movie['director'] = $m->{'$t'};
                    break;
                case 'aka': // 又名
                    if (property_exists($m, '@lang') && $m->{'@lang'} == 'zh_CN') { // 电影中文名
                        $movie['name_cn'] = $m->{'$t'};
                    } else {
                        array_push($movie['alias'], $m->{'$t'});
                    }
                    break;
                case 'title': // 英文名称
                    $movie['name'] = $m->{'$t'};
                    break;
                case 'imdb': // imdb地址
                    $movie['imdb'] = $m->{'$t'};
                    break;
                case 'pubdate': // 上映日期
                    $movie['pubdate'] = $m->{'$t'};
                    break;
                case 'country': // 国家或地区
                    $movie['country'] = $m->{'$t'};
                    break;
                case 'year': // 年代
                    $movie['year'] = $m->{'$t'};
                    break;
                case 'cast':
                    array_push($movie['cast'], $m->{'$t'});
                    break;
                case 'movie_type':
                    array_push($movie['movie_type'], $m->{'$t'});
                    break;
                case 'language':
                    array_push($movie['language'], $m->{'$t'});
                    break;
                case 'movie_duration':
                    array_push($movie['duration'], $m->{'$t'});
                    break;
            }
        }

        return $movie;
    }
}

/* End of file douban_helper.php */
/* Location: ./application/help/douban_helper.php */