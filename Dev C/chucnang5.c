#include <stdio.h>
#include <math.h>
#include "thuvien.h"

void doi_tien(int so_tien) {
  
  printf("Nhap so tien: ");
  scanf("%d", &so_tien);
  int mang_menh_gia[] = { 500, 200, 100, 50, 20, 10, 5, 2, 1};
  int mang_so_luong_tien[sizeof(mang_menh_gia) / sizeof(int)];

  for (int i = 0; i < sizeof(mang_so_luong_tien) / sizeof(int); i++) {
    mang_so_luong_tien[i] = 0;
  }

  for (int i = 0; i < sizeof(mang_menh_gia) / sizeof(int); i++) {
    mang_so_luong_tien[i] = so_tien / mang_menh_gia[i];
    so_tien -= mang_menh_gia[i] * mang_so_luong_tien[i];
  }

  for (int i = 0; i < sizeof(mang_so_luong_tien) / sizeof(int); i++) {
    if (mang_so_luong_tien[i] > 0) {
      printf("%d to %d\n", mang_so_luong_tien[i], mang_menh_gia[i]);
    }
  }
}


