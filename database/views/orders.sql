drop view if exists orders_vw;;
create view orders_vw as
  Select b.first_name , b.last_name , a.*
  FROM orders a
  left JOIN users b
  ON a.user_id = b.id
