create view cart_items_vw as
  SELECT A.id as 'cart_id' , a.user_id , a.product_id , a.quantity as 'cart_quantity' , B.*
FROM carts A LEFT JOIN product_vw B
ON A.product_id = B.id;
