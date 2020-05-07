drop view if exists job_order_assigment_vw;
create view job_order_assigment_vw as
  Select b.first_name , b.last_name , C.client_name ,c.make_model , c.job_order_date , c.notes as job_order_notes ,c.checklist_id ,
  c.is_invoiced, c.is_released , c.is_warranty_expired ,
   A.*
  FROM job_order_assignments A
  left JOIN user_employees B
  ON a.employee_id = B.id
  left JOIN job_order_vw C
  ON a.job_order_id = c.job_order_id;
