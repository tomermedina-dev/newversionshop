drop view if exists order_items_vw;
create view order_items_vw as
  SELECT A.id as 'item_id',a.order_id , a.product_id  , a.quantity ,a.discount , b.name ,  b.product_categ ,
  b.product_image , b.type_id , b.brand , b.car_brand , b.car_model , b.description , b.price , b.status as product_status
FROM order_items A LEFT JOIN product_vw B
ON A.product_id = B.id;
