require 'rubygems'
file = File.new("sql.sql", "a")
(1000001..1002000).each do |id|
  sql = sprintf("INSERT INTO `handbooks` SET `unique_id`='NO.CN%d', `is_used`='N', `created_at`=NOW(),  `updated_at`=NOW();", id)
  file.puts(sql)
end