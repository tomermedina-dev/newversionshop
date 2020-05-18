drop view if exists vehicle_slot_vw;
create view vehicle_slot_vw as
select a.* , b.checklist_id , b.job_order_id , b.make_model , b.client_name , b.first_name as assigned_first_name  ,
b.last_name as assigned_last_name , b.employee_id , b.start , b.end
from shop_floor_slots a
left join job_order_assigment_vw b
on a.id = b.slot_id and b.is_released ='0';
