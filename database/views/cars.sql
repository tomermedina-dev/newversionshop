drop view if exists car_vw ;
create view car_vw as
  SELECT fGetFirstImage(A.id , 'car') as 'car_image' , A.*
  FROM cars A

;
