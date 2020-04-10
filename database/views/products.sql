create view product_vw as
  SELECT b.type_name as 'product_categ',fGetFirstImage(A.id , 'product') as 'product_image' , A.*
FROM products A LEFT JOIN product_types B
ON A.type_id = B.id;
