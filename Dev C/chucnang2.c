#include <stdio.h>
#include <math.h>
#include "thuvien.h"

void UC_BC(){
	int x, y, a, b;
	printf("Nhap hai so: ");
	scanf("%d %d", &x, &y);
    a = x, b = y;
		while( y != 0){
		    int z = x%y;
		    x = y;
		    y = z;
	    }
	int ucln = x;
		
	
    printf("%d\n", ucln);

	printf("%d", a*b/ucln); 
	
	
}
	
	
	

	
