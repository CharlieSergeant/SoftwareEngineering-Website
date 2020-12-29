select min(close) from $company where date between $startDate and $endDate;

select max(close) from $company where date between $startDate and $endDate;

select avg(close) from $company where date between $stateDate and $endDate;