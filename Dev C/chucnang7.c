#include <stdio.h>
#include <math.h>
#include "thuvien.h"

void tragop(){
	printf("Nhap so phan tram vay: ");
	int money, total = 0, havetopay;
	scanf("%d", &money);
	money = 500000000 / 100 * money;
	havetopay = money/24;
	for (int i = 1; i <= 24; i++)
	{
		printf("--Thang %d--\n", i);
		printf("Tien lai phai tra: %d\n", money / 1000 * 72);
		printf("Goc phai tra: %d\n", havetopay);
		printf("So tien phai tra: %d\n", havetopay + money / 1000 * 72);
		money -= havetopay;
		printf("So tien con lai: %d\n", money);
	}
}