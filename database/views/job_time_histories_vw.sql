drop view if exists job_time_histories_vw ;
create view job_time_histories_vw as
SELECT a.* , TIME_FORMAT(TIMEDIFF(end ,start) ,  "%H:%i:%s" ) as total_work_hrs FROM job_time_histories a;
