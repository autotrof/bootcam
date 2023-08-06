<template>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img :src="logo" alt="Logo Aplikasi" class="brand-image img-circle elevation-3"
                style="opacity: .8">
            <span class="brand-text font-weight-light">{{ $app_name }}</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <Link :href="route('job-position.index')" class="nav-link" :class="{'active': router.page.url.startsWith('/job-position')}">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Master Jabatan
                            </p>
                        </Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('employee.index')" class="nav-link" :class="{'active': router.page.url.startsWith('/employee')}">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Master Karyawan
                            </p>
                        </Link>
                    </li>
                    <li class="nav-item">
                        <Link :href="route('attendance.index')" class="nav-link" :class="{'active': router.page.url.startsWith('/attendance')}">
                            <i class="nav-icon fas fa-calendar"></i>
                            <p>
                                Daftar Kehadiran
                            </p>
                        </Link>
                    </li>
                    <li class="nav-item">
                        <a :href="route('logout')" class="nav-link text-danger">
                            <i class="nav-icon fas fa-lock"></i>
                            <p>
                                Keluar
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <slot></slot>
</template>

<script setup>
import { Link, router } from '@inertiajs/vue3';
import logo from '../assets/dist/img/AdminLTELogo.png';
</script>
