# HPC Dashboard - User Manual

## Table of Contents
1. [Introduction](#introduction)
2. [Getting Started](#getting-started)
3. [Roles and Permissions](#roles-and-permissions)
4. [Dashboard Overview](#dashboard-overview)
5. [Managing Resources](#managing-resources)
6. [Managing Services](#managing-services)
7. [User Management](#user-management)
8. [Docker Installation](#docker-installation)

---

## 1. Introduction
The HPC Dashboard is a centralized management system for High-Performance Computing resources. It provides real-time monitoring, billing, and user management capabilities.

## 2. Getting Started
To access the system, navigate to the home page and log in with your credentials.
- **Default Admin:** `admin@hpc.com` / `password`

## 3. Roles and Permissions
- **Admin:** Full access to all features, including User Management, Resource Editing, and Service Configuration.
- **User:** View-only access to dashboard, jobs, and billing. Can view available resources and services but cannot modify them.

## 4. Dashboard Overview
The dashboard provides a high-level view of:
- Total CPU Hours and Memory Usage.
- Active Jobs and Monthly Revenue.
- Utilization trends for the last 7 days.

## 5. Managing Resources
Navigate to the **Resources** tab to view the list of hardware resources.
- **Admins** can add new resources (CPU, GPU, etc.), edit existing ones, or remove them.
- Resources include details like Name, Type, and Capacity.

## 6. Managing Services
The **Services** tab lists available computing services and their pricing.
- **Admins** can define new services, set descriptions, and adjust pricing.

## 7. User Management
Accessible via the **Users** tab.
- **Admins** can create new users, assign roles (Admin/User), reset passwords, and delete accounts.

## 8. Docker Installation
To run the system using Docker:
1. Ensure Docker and Docker Compose are installed.
2. Run `docker-compose up -d --build`.
3. The application will be available at `http://localhost:8000`.
