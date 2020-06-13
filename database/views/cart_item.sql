drop view if exists cart_items_vw;
create view cart_items_vw as
  SELECT a.id as 'cart_id' , a.user_id , a.product_id , a.quantity as 'cart_quantity' , B.*
FROM carts a LEFT JOIN product_vw B
ON a.product_id = B.id;
 
