drop view if exists bookings_vw;
create view bookings_vw as
  select b.service_categ , b.service_image_id , b.service_image , b.name as service_title , b.description ,
  b.price ,b.booking_price , a.* , c.car_brand , c.model , c.vin , c.plate_number
  from bookings a
  LEFT JOIN services_vw b
  on a.service_id = b.id
  LEFT JOIN user_units c
  on a.unit_id = c.id;
