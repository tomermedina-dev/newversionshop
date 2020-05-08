drop view if exists services_vw;
create view services_vw as
  SELECT b.type_name as 'service_categ',c.id as 'service_image_id' , fGetFirstImage(a.id , 'service') as 'service_image' , a.*
FROM services a LEFT JOIN service_types b
ON a.type_id = b.id
LEFT JOIN images c on a.id = c.ref_id and c.type = 'service';
