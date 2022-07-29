import React, {Suspense, Fragment, lazy} from "react";
import {Switch, Redirect, Route} from "react-router-dom";

import Spinner from "./components/Spinner";
import AdminLayout from "./layouts/AdminLayout";
import BoxLayout from "./layouts/BoxLayout";

import GuestGuard from "./components/Auth/GuestGuard";
import AuthGuard from "./components/Auth/AuthGuard";
import {userRoles} from "./enums/UserRoles";

export const renderRoutes = (routes = []) => (
	<Suspense fallback={<Spinner />}>
		<Switch>
			{routes.map((route, i) => {
				const Guard = route.guard || Fragment;
				const Layout = route.layout || Fragment;
				const Component = route.component;
				return (
					<Route
						key={i}
						path={route.path}
						exact={route.exact}
						render={(props) => (
							<Guard {...(route.guard ? {permissions: route.permissions} : {})}>
								<Layout>{route.routes ? renderRoutes(route.routes) : <Component {...props} />}</Layout>
							</Guard>
						)}
					/>
				);
			})}
		</Switch>
	</Suspense>
);

const routes = [
	{
		exact: true,
		path: "/404",
		component: lazy(() => import("./views/errors/404/NotFound404")),
	},
	{
		exact: true,
		path: "/access-denied",
		component: lazy(() => import("./views/errors/access-denied")),
	},
	{
		exact: true,
		path: "/under-construction",
		layout: AdminLayout,
		component: lazy(() => import("./views/errors/under-construction/construction")),
	},
	{
		exact: true,
		path: "/",
		component: lazy(() => import("./views/home")),
	},
	{
		exact: true,
		path: "/home",
		component: lazy(() => import("./views/home")),
	},
	{
		exact: true,
		path: "/employee/signin",
		layout: BoxLayout,
		guard: GuestGuard,
		component: lazy(() => import("./views/signin/employee/SignIn")),
	},
	{
		exact: true,
		path: "/forgot-password",
		layout: BoxLayout,
		guard: GuestGuard,
		component: lazy(() => import("./views/forgotpassword")),
	},
	{
		exact: true,
		path: "/dashboard",
		layout: AdminLayout,
		guard: AuthGuard,
		permissions: [userRoles.Client],
		component: lazy(() => import("./views/dashboard/client")),
	},
	{
		exact: true,
		path: "/admin/dashboard",
		layout: AdminLayout,
		guard: AuthGuard,
		permissions: [userRoles.SuperAdmin, userRoles.Administrator],
		component: lazy(() => import("./views/dashboard/admin")),
	},
	{
		exact: true,
		path: "/checker/dashboard",
		layout: AdminLayout,
		guard: AuthGuard,
		permissions: [userRoles.Checker],
		component: lazy(() => import("./views/dashboard/checker")),
	},
	{
		exact: true,
		path: "/validator/dashboard",
		layout: AdminLayout,
		guard: AuthGuard,
		permissions: [userRoles.Validator],
		component: lazy(() => import("./views/dashboard/validator")),
	},
	{
		exact: true,
		path: "/users/clients",
		layout: AdminLayout,
		guard: AuthGuard,
		permissions: [userRoles.SuperAdmin, userRoles.Administrator],
		component: lazy(() => import("./views/usermanagement/clients")),
	},
	{
		exact: true,
		path: "/users/clients/payment",
		layout: AdminLayout,
		guard: AuthGuard,
		permissions: [userRoles.SuperAdmin, userRoles.Administrator],
		component: lazy(() => import("./views/usermanagement/payments")),
	},
	{
		exact: true,
		path: "/users/checkers",
		layout: AdminLayout,
		guard: AuthGuard,
		permissions: [userRoles.SuperAdmin, userRoles.Administrator],
		component: lazy(() => import("./views/usermanagement/checkers")),
	},
	{
		exact: true,
		path: "/users/validators",
		layout: AdminLayout,
		guard: AuthGuard,
		permissions: [userRoles.SuperAdmin, userRoles.Administrator],
		component: lazy(() => import("./views/usermanagement/validators")),
	},
	{
		exact: true,
		path: "/users/admin-users",
		layout: AdminLayout,
		guard: AuthGuard,
		permissions: [userRoles.SuperAdmin],
		component: lazy(() => import("./views/usermanagement/admin")),
	},
	{
		exact: true,
		path: "/suppliers",
		layout: AdminLayout,
		guard: AuthGuard,
		permissions: [userRoles.SuperAdmin, userRoles.Administrator],
		component: lazy(() => import("./views/usermanagement/suppliers")),
	},
	{
		exact: true,
		path: "/users/clients/profile/:id",
		layout: AdminLayout,
		guard: AuthGuard,
		permissions: [userRoles.SuperAdmin, userRoles.Administrator],
		component: lazy(() => import("./views/usermanagement/clients/Profile")),
	},
	{
		exact: true,
		path: "/upload-files",
		layout: AdminLayout,
		guard: AuthGuard,
		permissions: [userRoles.Client],
		component: lazy(() => import("./views/fileupload")),
	},
	{
		exact: true,
		path: "/entries/pending-entries",
		layout: AdminLayout,
		guard: AuthGuard,
		permissions: [userRoles.Client],
		component: lazy(() => import("./views/client/pending-entries")),
	},
	{
		exact: true,
		path: "/entries/recent-entries",
		layout: AdminLayout,
		guard: AuthGuard,
		permissions: [userRoles.Client],
		component: lazy(() => import("./views/client/recent-entries")),
	},
	{
		exact: true,
		path: "/entries/approved-entries",
		layout: AdminLayout,
		guard: AuthGuard,
		permissions: [userRoles.Client],
		component: lazy(() => import("./views/client/approved-entries")),
	},
	{
		exact: true,
		path: "/entries/rejected-entries",
		layout: AdminLayout,
		guard: AuthGuard,
		permissions: [userRoles.Client],
		component: lazy(() => import("./views/client/rejected-entries")),
	},
	{
		exact: true,
		path: "/entries/summary",
		layout: AdminLayout,
		guard: AuthGuard,
		permissions: [userRoles.Client],
		component: lazy(() => import("./views/client/summary")),
	},
	{
		exact: true,
		path: "/checker/entries/pending-entries",
		layout: AdminLayout,
		guard: AuthGuard,
		permissions: [userRoles.Checker],
		component: lazy(() => import("./views/checker/pending-entries")),
	},
	{
		exact: true,
		path: "/checker/entries/checked-entries",
		layout: AdminLayout,
		guard: AuthGuard,
		permissions: [userRoles.Checker],
		component: lazy(() => import("./views/checker/checked-entries")),
	},
	{
		exact: true,
		path: "/checker/entries/approved-entries",
		layout: AdminLayout,
		guard: AuthGuard,
		permissions: [userRoles.Checker],
		component: lazy(() => import("./views/checker/approved-entries")),
	},
	{
		exact: true,
		path: "/checker/entries/rejected-entries",
		layout: AdminLayout,
		guard: AuthGuard,
		permissions: [userRoles.Checker],
		component: lazy(() => import("./views/checker/rejected-entries")),
	},
	{
		exact: true,
		path: "/checker/clients",
		layout: AdminLayout,
		guard: AuthGuard,
		permissions: [userRoles.Checker],
		component: lazy(() => import("./views/checker/clientList")),
	},
	{
		exact: true,
		path: "/checker/entries/no-entry-clients",
		layout: AdminLayout,
		guard: AuthGuard,
		permissions: [userRoles.Checker],
		component: lazy(() => import("./views/checker/clients-no-entry")),
	},
	{
		exact: true,
		path: "/validator/entries/pending-entries",
		layout: AdminLayout,
		guard: AuthGuard,
		permissions: [userRoles.Validator],
		component: lazy(() => import("./views/validator/pending-entries")),
	},
	{
		exact: true,
		path: "/validator/entries/approved-entries",
		layout: AdminLayout,
		guard: AuthGuard,
		permissions: [userRoles.Validator],
		component: lazy(() => import("./views/validator/approved-entries")),
	},
	{
		exact: true,
		path: "/validator/entries/rejected-entries",
		layout: AdminLayout,
		guard: AuthGuard,
		permissions: [userRoles.Validator],
		component: lazy(() => import("./views/validator/rejected-entries")),
	},
	{
		exact: true,
		path: "/validator/entries/checked-entries",
		layout: AdminLayout,
		guard: AuthGuard,
		permissions: [userRoles.Validator],
		component: lazy(() => import("./views/validator/checked-entries")),
	},
	{
		exact: true,
		path: "/validator/checkers",
		layout: AdminLayout,
		guard: AuthGuard,
		permissions: [userRoles.Validator],
		component: lazy(() => import("./views/validator/checkerList")),
	},
	{
		exact: true,
		path: "/admin/checker-entries/pending-entries",
		layout: AdminLayout,
		guard: AuthGuard,
		permissions: [userRoles.SuperAdmin, userRoles.Administrator],
		component: lazy(() => import("./views/admin/checker-pending-entries")),
	},
	{
		exact: true,
		path: "/admin/checker-entries/rejected-entries",
		layout: AdminLayout,
		guard: AuthGuard,
		permissions: [userRoles.SuperAdmin, userRoles.Administrator],
		component: lazy(() => import("./views/admin/checker-rejected-entries")),
	},
	{
		exact: true,
		path: "/admin/validator-entries/pending-entries",
		layout: AdminLayout,
		guard: AuthGuard,
		permissions: [userRoles.SuperAdmin, userRoles.Administrator],
		component: lazy(() => import("./views/admin/validator-pending-entries")),
	},
	{
		exact: true,
		path: "/admin/validator-entries/checked-entries",
		layout: AdminLayout,
		guard: AuthGuard,
		permissions: [userRoles.SuperAdmin, userRoles.Administrator],
		component: lazy(() => import("./views/admin/validator-checked-entries")),
	},
	{
		exact: true,
		path: "/admin/messages",
		layout: AdminLayout,
		guard: AuthGuard,
		permissions: [userRoles.SuperAdmin, userRoles.Administrator],
		component: lazy(() => import("./views/admin/message-list")),
	},
	{
		exact: true,
		path: "/reports/sales",
		layout: AdminLayout,
		guard: AuthGuard,
		permissions: [userRoles.Client],
		component: lazy(() => import("./views/reports/sales")),
	},
	{
		exact: true,
		path: "/reports/expenditure",
		layout: AdminLayout,
		guard: AuthGuard,
		permissions: [userRoles.Client],
		component: lazy(() => import("./views/reports/expenditure")),
	},
	{
		exact: true,
		path: "/reports/purchase",
		layout: AdminLayout,
		guard: AuthGuard,
		permissions: [userRoles.Client],
		component: lazy(() => import("./views/reports/purchase")),
	},
	{
		exact: true,
		path: "/vat-reports",
		layout: AdminLayout,
		guard: AuthGuard,
		permissions: [userRoles.Client],
		component: lazy(() => import("./views/vatreports/client")),
	},
	{
		exact: true,
		path: "/checker/vat-reports",
		layout: AdminLayout,
		guard: AuthGuard,
		permissions: [userRoles.Checker],
		component: lazy(() => import("./views/vatreports/checker")),
	},
	{
		exact: true,
		path: "/validator/vat-reports",
		layout: AdminLayout,
		guard: AuthGuard,
		permissions: [userRoles.Validator],
		component: lazy(() => import("./views/vatreports/validator")),
	},
	{
		exact: true,
		path: "/admin/vat-reports",
		layout: AdminLayout,
		guard: AuthGuard,
		permissions: [userRoles.SuperAdmin, userRoles.Administrator],
		component: lazy(() => import("./views/vatreports/admin")),
	},
	{
		exact: true,
		path: "/profile",
		layout: AdminLayout,
		guard: AuthGuard,
		component: lazy(() => import("./views/profile")),
	},
	{
		exact: true,
		path: "/change-password",
		layout: AdminLayout,
		guard: AuthGuard,
		component: lazy(() => import("./views/changepassword")),
	},
	{
		path: "*/**",
		exact: true,
		component: () => <Redirect to="/404" />,
	},
];

export default routes;
