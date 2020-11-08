drop view if exists job_order_vw;
create view job_order_vw as
  Select a.id as job_order_id ,c.id as job_monitoring_id ,a.notes as job_order_notes ,a.created_at as job_order_date ,a.status as job_order_status,
  a.is_invoiced, a.is_released , a.is_warranty_expired ,  a.is_deleted ,
   b.id as checklist_id , b.* ,
   d.booking_price , d.payment_status as booking_payment_status
  FROM job_orders a
  left JOIN check_lists b
  ON a.checklist_id = b.id
  LEFT JOIN job_order_assignments c
  ON a.id = c.job_order_id
  LEFT JOIN bookings_vw d
  ON b.booking_id = d.id;
