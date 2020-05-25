drop view if exists invoices_vw;
create view invoices_vw as
  select a.*,b.total_product_amount , b.total_service_fee , b.totals ,  c.total_paid
  from invoices a
  left join job_order_totals_vw b on a.job_order_id = b.job_id
  left join invoice_payments_totals_vw c on  a.id = c.invoice_id;
