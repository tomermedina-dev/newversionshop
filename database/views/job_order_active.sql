drop view if exists job_order_active_vw;
create view job_order_active_vw as
select * from job_order_assigment_vw
where is_released = 0;
