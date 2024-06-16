#include <stdio.h>
#include <math.h>
#include "thuvien.h"

void kiemtraso(int x, int j){
	
	printf("\nMoi ban nhap 1 so: ");
	scanf("%d", &x);
	if(x < 0) {
		printf("So vua nhap la so nguyen am\n");
		return 0;
	}
	else if( x == 0) {
	    printf("Ban vua nhap so 0");
	    return 0;
	}
	
	for(int i = 2; i < x; i++){
		if(x % i == 0){
		j++;
		break;
		} 
	}
	if(j > 0) printf("%d khong phai la so nguyen to\n", x);
	else printf("%d la so nguyen to\n", x);
	
	int a = sqrt(x);
	if(a*a == x) printf("%d la so chinh phuong\n", x);
	else printf("%d khong phai la so chinh phuong\n", x);
}

