drop view if exists job_order_totals_monthly_vw;
create view job_order_totals_monthly_vw as
SELECT  sum(REPLACE(unit_price ,',' , '') * quantity  )  + sum(REPLACE(service_fee ,',' , '')) AS totals , YEAR(created_at) as YEAR , MONTH(created_at) as MONTH
FROM
job_order_items
where is_deleted = 0
GROUP by YEAR(created_at)  , MONTH(created_at) 
