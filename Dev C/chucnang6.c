#include <stdio.h>
#include <math.h>
#include "thuvien.h"

void bank() {
	int x;
	printf("Nhap so tien muon vay: ");
	scanf("%d", &x);
	float sotienconlai = x;
	float laisuat = 0.05;
	float gocphaitra = x/12;
	for(int i = 1; i <= 12; i++){
		printf("Lai phai tra : %.1f\n", sotienconlai * laisuat);
		printf("Goc phai tra: %.1f\n", gocphaitra);
		printf("So tien phai tra: %.1f\n", sotienconlai * laisuat + gocphaitra);
		sotienconlai = sotienconlai - gocphaitra;
		printf("So tien con lai: %.1f\n", sotienconlai);
		printf("\n");
	}
}