drop view if exists featured_vw;
create view featured_vw as
  SELECT b.image_name as 'featured_image' , a.*
FROM featureds a
 LEFT JOIN images b
ON a.id = b.ref_id and b.type='featured';
