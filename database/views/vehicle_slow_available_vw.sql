drop view if exists vehicle_slot_available_vw;
create view vehicle_slot_available_vw as
  SELECT * FROM `vehicle_slot_vw` WHERE id NOT in (select slot_id from job_order_active_vw );
