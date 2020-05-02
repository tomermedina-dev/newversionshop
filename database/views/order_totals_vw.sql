drop view if exists order_totals_vw;
create view order_totals_vw as
  SELECT order_id, count(item_id) as items_count , sum(price * quantity) as total_amount   FROM `order_items_vw` GROUP by order_id
