drop view if exists pending_bookings_vw;
create view pending_bookings_vw as
  select * from bookings_vw where id not in (Select order_number from check_lists);
