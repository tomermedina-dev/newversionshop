create view wishlist_vw as
    SELECT A.id as 'wishlist_id' , a.user_id , a.product_id  , B.*
  FROM wish_lists A LEFT JOIN product_vw B
  ON A.product_id = B.id;
