drop view if exists promos_vw ;
create view promos_vw as
  select a.* , b.name , b.brand , b.car_brand , b.car_model , b.description as product_description, b.price
  from promos a
  left join products b on a.product_id = b.id
