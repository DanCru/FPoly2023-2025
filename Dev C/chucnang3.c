#include <stdio.h>
#include <math.h>
#include "thuvien.h"

void karaoke(){
	int x, y;
	int allmoney;
	nhapLai:
	printf("Ban muon thue phong karaoke luc may gio: ");
    scanf("%d", &x);
	if(x < 12){
		printf("Chung toi khong mo cua vao gio nay!\n");
		goto nhapLai;
	}
	nhapLai2:
	printf("Tra phong karaoke luc may gio: ");
	scanf("%d", &y);
	if(y > 23 ){
		printf("Chung toi khong mo cua vao gio nay!\n");
        goto nhapLai2;
	}
	//50k/1h tron 3h dau, bat dau tu gio t4 giam 30% la 35k
	int times = y - x;
	printf("\nDa xac nhan ban thue trong %d gio\n", times);
	if(times <= 3){
		allmoney = times*50;
	}
	else if(times > 3){
		allmoney = (3*50) + (times-3)*35;
	}
	//14h - 17h neu thue dc giam them 10% cho tong so tien
	if(x >= 14 && x <= 17){
		allmoney = allmoney*0.9;
	}
	printf("Tong so tien ban can tra la: %d\n", allmoney);
}