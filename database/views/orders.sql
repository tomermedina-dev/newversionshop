drop view if exists orders_vw;;
create view orders_vw as
  Select b.first_name , b.last_name , A.*
  FROM orders A
  left JOIN users B
  ON a.user_id = B.id
