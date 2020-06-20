drop view if exists product_vw;
create view product_vw as
  SELECT b.type_name as 'product_categ',fGetFirstImage(a.id , 'product') as 'product_image' , a.id , a.type_id , a.name ,
  a.brand ,  a.car_brand , a.car_model , a.description , a.quantity , a.status , a.created_at , a.updated_at ,
  c.percentage as promo ,
  case when c.percentage IS  NULL  THEN a.price  ELSE c.price - (c.price *  c.percentage  )      end as price ,
  a.price as old_price ,
  b.status as type_status
FROM products a LEFT JOIN product_types b
ON a.type_id = b.id
LEFT JOIN promos_vw c
ON a.id = c.product_id ;
