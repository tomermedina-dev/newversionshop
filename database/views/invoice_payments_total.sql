drop view if exists invoice_payments_totals_vw;
create view invoice_payments_totals_vw as
  select id as payment_id , invoice_id , sum(amount) as total_paid
  from invoice_payments
  group by id;
