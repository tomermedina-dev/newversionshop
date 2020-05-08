create view wishlist_vw as
    SELECT a.id as 'wishlist_id' , a.user_id , a.product_id  , b.*
  FROM wish_lists a LEFT JOIN product_vw b
  ON a.product_id = b.id;
