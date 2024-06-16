#include <stdio.h>
#include <math.h>
#include "thuvien.h"

void tiendien(){
	float so_kwh;
	float tien;
	printf("Nhap so kwh su dung: ");
	scanf("%f", &so_kwh);
	
	if(so_kwh <= 50) tien = so_kwh*1.678;
	else if(so_kwh <= 100) tien = (50*1.678)+(so_kwh-50)*1.734;
	else if(so_kwh <= 200) tien = (50*1.678)+(50*1.734)+(so_kwh-100)*2.014;
	else if(so_kwh <= 300) tien = (50*1.678)+(50*1.734)+(100*2.014)+(so_kwh-200)*2.536;
	else if(so_kwh <= 400) tien = (50*1.678)+(50*1.734)+(100*2.014)+(100*2.536)+(so_kwh-300)*2.834;
	else tien = (50*1.678)+(50*1.734)+(100*2.014)+(100*2.536)+(100*2.834)+(so_kwh-400)*2.927;

	printf("So tien ban phai tra la %.1fk", tien);
}