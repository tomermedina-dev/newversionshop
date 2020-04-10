drop view if exists cart_totals_vw;
create view cart_totals_vw as
  SELECT user_id , count(cart_id) as items_count , sum(price * cart_quantity) as total_amount   FROM `cart_items_vw` GROUP by user_id

 
