drop view if exists services_vw;
create view services_vw as
  SELECT b.type_name as 'service_categ',c.id as 'service_image_id' , fGetFirstImage(A.id , 'service') as 'service_image' , A.*
FROM services A LEFT JOIN service_types B
ON A.type_id = B.id
LEFT JOIN images C on A.id = C.ref_id and C.type = 'service';
