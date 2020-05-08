drop view if exists product_vw;
create view product_vw as
  SELECT product_types.type_name as 'product_categ',fGetFirstImage(A.id , 'product') as 'product_image' , A.*
FROM products A LEFT JOIN product_types
ON A.type_id = product_types.id;
