#!/bin/bash

# Определяем символы, используемые для прогресс-линии
progress_chars="/-\|"

# Цикл с имитацией прогресс-линии
while true; do
    for char in ${progress_chars}; do
        echo -ne "\r${char}"
        sleep 0.1  # Задержка между символами прогресс-линии
    done
done