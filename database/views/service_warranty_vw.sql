drop view if exists service_warranty_vw;
create view service_warranty_vw as
  Select a.id as warranty_id ,  a.warranty_start , a.warranty_end , a.status as warranty_status , a.is_voided , a.void_reason, b.*
  from service_warranties a
  left join job_order_vw b
  on a.job_order_id = b.job_order_id
