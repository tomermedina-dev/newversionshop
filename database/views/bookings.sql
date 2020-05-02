drop view if exists bookings_vw;
create view bookings_vw as
  select b.service_categ , b.service_image_id , b.service_image , b.name as service_title , b.description ,
  b.price , a.*
  from bookings A
  LEFT JOIN services_vw B
  on a.service_id = b.id ;