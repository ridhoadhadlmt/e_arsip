<?php

use App\Models\Category;
use App\Models\WorkUnit;
use App\Models\Disposition;
use App\Models\IncomingMail;
use App\Models\OutgoingMail;
use App\Models\OutcomingMail;
use App\Models\User;
use Illuminate\Http\Request;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('admin', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard');
});
Breadcrumbs::for('setting', function (BreadcrumbTrail $trail) {
    $trail->push('Pengaturan');
});
Breadcrumbs::for('category', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin');
    $trail->push('Kategori', route('category'));
});
Breadcrumbs::for('category.create', function (BreadcrumbTrail $trail): void {
    $trail->parent('category');
    $trail->push('Tambah', route('category.create'));
});
Breadcrumbs::for('category.edit', function (BreadcrumbTrail $trail, Category $category): void {
    $trail->parent('category');
    $trail->push('Ubah Kategori', route('category.edit', $category));
});

Breadcrumbs::for('disposition', function (BreadcrumbTrail $trail) {
    $trail->parent('admin');
    $trail->push('Disposisi', route('disposition'));
});
Breadcrumbs::for('disposition.create', function (BreadcrumbTrail $trail): void {
    $trail->parent('disposition');
    $trail->push('Tambah', route('disposition.create'));
});
Breadcrumbs::for('disposition.edit', function (BreadcrumbTrail $trail, Disposition $disposition): void {
    $trail->parent('disposition');
    $trail->push('Ubah Disposisi', route('disposition.edit', $disposition));
});

Breadcrumbs::for('workUnit', function (BreadcrumbTrail $trail) {
    $trail->parent('admin');
    $trail->push('Unit Kerja', route('workUnit'));
});
Breadcrumbs::for('workUnit.create', function (BreadcrumbTrail $trail) {
    $trail->parent('workUnit');
    $trail->push('Tambah Unit Kerja', route('workUnit.create'));
});
Breadcrumbs::for('workUnit.edit', function (BreadcrumbTrail $trail, WorkUnit $workunit): void {
    $trail->parent('workUnit');
    $trail->push('Ubah Unit Kerja', route('workUnit.edit', $workunit));
});

Breadcrumbs::for('institution', function (BreadcrumbTrail $trail) {
    $trail->parent('admin');
    $trail->push('Instatnsi', route('institution'));
});

Breadcrumbs::for('incomingMail', function (BreadcrumbTrail $trail) {
    $trail->parent('admin');
    $trail->push('Surat Masuk', route('incomingMail'));
});
Breadcrumbs::for('incomingMail.create', function (BreadcrumbTrail $trail) {
    $trail->parent('incomingMail');
    $trail->push('Tambah Surat Masuk', route('incomingMail.create'));
});
Breadcrumbs::for('incomingMail.edit', function (BreadcrumbTrail $trail, IncomingMail $incomingMail) {
    $trail->parent('incomingMail');
    $trail->push('Ubah Surat Masuk', route('incomingMail.edit', $incomingMail));
});
Breadcrumbs::for('incomingMail.detail', function (BreadcrumbTrail $trail, IncomingMail $incomingMail) {
    $trail->parent('incomingMail');
    $trail->push($incomingMail->no_mail, route('incomingMail.detail', $incomingMail));
});
Breadcrumbs::for('incomingMail.disposition', function (BreadcrumbTrail $trail, IncomingMail $incomingMail) {
    $trail->parent('incomingMail');
    $trail->push($incomingMail->no_mail, route('incomingMail.disposition', $incomingMail));
});
Breadcrumbs::for('outgoingMail', function (BreadcrumbTrail $trail) {
    $trail->parent('admin');
    $trail->push('Surat Keluar', route('outgoingMail'));
});
Breadcrumbs::for('outgoingMail.create', function (BreadcrumbTrail $trail) {
    $trail->parent('outgoingMail');
    $trail->push('Tambah Surat Keluar', route('outgoingMail.create'));
});
Breadcrumbs::for('outgoingMail.edit', function (BreadcrumbTrail $trail, OutgoingMail $outgoingMail) {
    $trail->parent('outgoingMail');
    $trail->push('Ubah Surat Keluar', route('outgoingMail.edit', $outgoingMail));
});
Breadcrumbs::for('outgoingMail.detail', function (BreadcrumbTrail $trail, OutgoingMail $outgoingMail) {
    $trail->parent('outgoingMail');
    $trail->push($outgoingMail->no_mail, route('outgoingMail.detail', $outgoingMail));
});
Breadcrumbs::for('submissionMail', function (BreadcrumbTrail $trail) {
    $trail->parent('admin');
    $trail->push('Surat Pengajuan', route('submissionMail'));
});
Breadcrumbs::for('submissionMail.disposition', function (BreadcrumbTrail $trail) {
    $trail->parent('submissionMail');
    $trail->push('Disposisi Surat Pengajuan', route('submissionMail'));
});
Breadcrumbs::for('user', function (BreadcrumbTrail $trail) {
    $trail->parent('admin');
    $trail->push('Pengguna', route('user'));
});
Breadcrumbs::for('user.create', function (BreadcrumbTrail $trail) {
    $trail->parent('user');
    $trail->push('Tambah Pengguna', route('user.create'));
});
Breadcrumbs::for('user.edit', function (BreadcrumbTrail $trail, User $user) {
    $trail->parent('user');
    $trail->push('Ubah Pengguna', route('user.edit', $user));
});

Breadcrumbs::for('report.incomingMail', function (BreadcrumbTrail $trail) {
    $trail->parent('admin');
    $trail->push('Laporan Surat Masuk', route('report.incomingMail'));
});
Breadcrumbs::for('report.outgoingMail', function (BreadcrumbTrail $trail) {
    $trail->parent('admin');
    $trail->push('Laporan Surat Keluar', route('report.outgoingMail'));
});
Breadcrumbs::for('report.incomingMail.search', function (BreadcrumbTrail $trail) {
    $trail->parent('report.incomingMail');
    $trail->push('Hasil Laporan', route('report.incomingMail.search'));
});
Breadcrumbs::for('report.outgoingMail.search', function (BreadcrumbTrail $trail) {
    $trail->parent('report.outgoingMail');
    $trail->push('Hasil Laporan', route('report.outgoingMail.search'));
});

Breadcrumbs::for('operator', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard');
});

Breadcrumbs::for('operator.incomingMail', function (BreadcrumbTrail $trail) {
    $trail->parent('operator');
    $trail->push('Surat Masuk', route('operator.incomingMail'));
});
Breadcrumbs::for('operator.incomingMail.detail', function (BreadcrumbTrail $trail, IncomingMail $incomingMail) {
    $trail->parent('operator.incomingMail');
    $trail->push($incomingMail->no_mail, route('operator.incomingMail.detail', $incomingMail));
});
Breadcrumbs::for('operator.incomingMail.disposition', function (BreadcrumbTrail $trail, IncomingMail $incomingMail) {
    $trail->parent('operator.incomingMail');
    $trail->push($incomingMail->no_mail, route('operator.incomingMail.disposition', $incomingMail));
});
Breadcrumbs::for('operator.outgoingMail', function (BreadcrumbTrail $trail) {
    $trail->parent('operator');
    $trail->push('Surat Keluar', route('operator.outgoingMail'));
});
Breadcrumbs::for('operator.outgoingMail.detail', function (BreadcrumbTrail $trail, OutgoingMail $outgoingMail) {
    $trail->parent('operator.outgoingMail');
    $trail->push($outgoingMail->no_mail, route('operator.outgoingMail.detail', $outgoingMail));
});
Breadcrumbs::for('operator.outgoingMail.disposition', function (BreadcrumbTrail $trail, OutgoingMail $outgoingMail) {
    $trail->parent('operator.outgoingMail');
    $trail->push($outgoingMail->no_mail, route('operator.outgoingMail.disposition', $outgoingMail));
});
