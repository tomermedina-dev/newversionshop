drop view if exists job_order_totals_vw;
create view job_order_totals_vw as
SELECT job_id , sum(unit_price * quantity  ) as total_product_amount  , sum(service_fee) as total_service_fee , sum(unit_price * quantity  )  + sum(service_fee) as totals
FROM
job_order_items
where is_deleted = 0
GROUP by job_id
