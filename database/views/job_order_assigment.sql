drop view if exists job_order_assigment_vw;
create view job_order_assigment_vw as
  Select b.first_name , b.last_name , c.client_name ,c.make_model , c.job_order_date , c.notes as job_order_notes ,c.checklist_id ,
  c.is_invoiced, c.is_released , c.is_warranty_expired ,
   a.*
  FROM job_order_assignments a
  left JOIN user_employees b
  ON a.employee_id = b.id
  left JOIN job_order_vw c
  ON a.job_order_id = c.job_order_id;
