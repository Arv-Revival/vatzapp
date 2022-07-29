const menuItems = {
	items: [
		// SUPER ADMIN USER
		{
			id: "navigation",
			title: "",
			type: "group",
			icon: "icon-navigation",
			userRole: 1,
			children: [
				{
					id: "dashboard",
					title: "Dashboard",
					type: "item",
					icon: "feather icon-home",
					url: "/admin/dashboard",
				},
				{
					id: "message",
					title: "Messages",
					type: "item",
					icon: "feather icon-mail",
					url: "/admin/messages",
				},
				{
					id: "checker-entries",
					title: "Checker Entries",
					type: "collapse",
					icon: "feather icon-box",
					children: [
						{
							id: "checker-pending-entries",
							title: "Checker Pending Entries",
							type: "item",
							url: "/admin/checker-entries/pending-entries",
						},
						{
							id: "checker-rejected-entries",
							title: "Checker Rejected Entries",
							type: "item",
							url: "/admin/checker-entries/rejected-entries",
						},
					],
				},
				{
					id: "validator-entries",
					title: "Validator Entries",
					type: "collapse",
					icon: "feather icon-box",
					children: [
						{
							id: "validator-pending-entries",
							title: "Validator Pending Entries",
							type: "item",
							url: "/admin/validator-entries/pending-entries",
						},
						{
							id: "validator-checked-entries",
							title: "Validator Checked Entries",
							type: "item",
							url: "/admin/validator-entries/checked-entries",
						},
					],
				},
				{
					id: "vat-reports",
					title: "VAT Reports",
					type: "item",
					icon: "feather icon-file-text",
					url: "/admin/vat-reports",
				},
				{
					id: "suppliers",
					title: "Suppliers",
					type: "item",
					icon: "feather icon-layers",
					url: "/suppliers",
				},
				{
					id: "users",
					title: "User Management",
					type: "collapse",
					icon: "feather icon-box",
					children: [
						{
							id: "clients",
							title: "Clients",
							type: "item",
							url: "/users/clients",
						},
						{
							id: "payments",
							title: "Payments",
							type: "item",
							url: "/users/clients/payment",
						},
						{
							id: "checkers",
							title: "Checkers",
							type: "item",
							url: "/users/checkers",
						},
						{
							id: "validators",
							title: "Validators",
							type: "item",
							url: "/users/validators",
						},
						{
							id: "admin-users",
							title: "Admin users",
							type: "item",
							url: "/users/admin-users",
						},
					],
				},
			],
		},
		// ADMIN USERS
		{
			id: "navigation",
			title: "",
			type: "group",
			icon: "icon-navigation",
			userRole: 2,
			children: [
				{
					id: "dashboard",
					title: "Dashboard",
					type: "item",
					icon: "feather icon-home",
					url: "/admin/dashboard",
				},
				{
					id: "message",
					title: "Messages",
					type: "item",
					icon: "feather icon-mail",
					url: "/admin/messages",
				},
				{
					id: "checker-entries",
					title: "Checker Entries",
					type: "collapse",
					icon: "feather icon-box",
					children: [
						{
							id: "checker-pending-entries",
							title: "Checker Pending Entries",
							type: "item",
							url: "/admin/checker-entries/pending-entries",
						},
					],
				},
				{
					id: "validator-entries",
					title: "Validator Entries",
					type: "collapse",
					icon: "feather icon-box",
					children: [
						{
							id: "validator-pending-entries",
							title: "Validator Pending Entries",
							type: "item",
							url: "/admin/validator-entries/pending-entries",
						},
						{
							id: "validator-checked-entries",
							title: "Validator Checked Entries",
							type: "item",
							url: "/admin/validator-entries/checked-entries",
						},
						{
							id: "checker-rejected-entries",
							title: "Validator Rejected Entries",
							type: "item",
							url: "/admin/checker-entries/rejected-entries",
						},
					],
				},
				{
					id: "vat-reports",
					title: "VAT Reports",
					type: "item",
					icon: "feather icon-file-text",
					url: "/admin/vat-reports",
				},
				{
					id: "suppliers",
					title: "Suppliers",
					type: "item",
					icon: "feather icon-layers",
					url: "/suppliers",
				},
				{
					id: "users",
					title: "User Management",
					type: "collapse",
					icon: "feather icon-box",
					children: [
						{
							id: "clients",
							title: "Clients",
							type: "item",
							url: "/users/clients",
						},
						{
							id: "payments",
							title: "Payments",
							type: "item",
							url: "/users/clients/payment",
						},
						{
							id: "checkers",
							title: "Checkers",
							type: "item",
							url: "/users/checkers",
						},
						{
							id: "validators",
							title: "Validators",
							type: "item",
							url: "/users/validators",
						},
					],
				},
			],
		},
		// CHECKER USER
		{
			id: "navigation",
			title: "",
			type: "group",
			icon: "icon-navigation",
			userRole: 3,
			children: [
				{
					id: "dashboard",
					title: "Dashboard",
					type: "item",
					icon: "feather icon-home",
					url: "/checker/dashboard",
				},
				{
					id: "entries",
					title: "Entries",
					type: "collapse",
					icon: "feather icon-box",
					children: [
						{
							id: "checked-entries",
							title: "Checked Entries",
							type: "item",
							url: "/checker/entries/checked-entries",
						},
						{
							id: "pending-entries",
							title: "Pending Entries",
							type: "item",
							url: "/checker/entries/pending-entries",
						},
						{
							id: "approved-entries",
							title: "Approved Entries",
							type: "item",
							url: "/checker/entries/approved-entries",
						},
						{
							id: "rejected-entries",
							title: "Rejected Entries",
							type: "item",
							url: "/checker/entries/rejected-entries",
						},
					],
				},
				{
					id: "clients",
					title: "Clients",
					type: "item",
					url: "/checker/clients",
					icon: "feather icon-layers",
				},
				{
					id: "vat-reports",
					title: "VAT Reports",
					type: "item",
					icon: "feather icon-file-text",
					url: "/checker/vat-reports",
				},
			],
		},
		// VALIDATOR USER
		{
			id: "navigation",
			title: "",
			type: "group",
			icon: "icon-navigation",
			userRole: 4,
			children: [
				{
					id: "dashboard",
					title: "Dashboard",
					type: "item",
					icon: "feather icon-home",
					url: "/validator/dashboard",
				},
				{
					id: "entries",
					title: "Entries",
					type: "collapse",
					icon: "feather icon-box",
					children: [
						{
							id: "checked-entries",
							title: "Checked Entries",
							type: "item",
							url: "/validator/entries/checked-entries",
						},
						{
							id: "pending-entries",
							title: "Pending Entries",
							type: "item",
							url: "/validator/entries/pending-entries",
						},
						{
							id: "approved-entries",
							title: "Approved Entries",
							type: "item",
							url: "/validator/entries/approved-entries",
						},
						{
							id: "rejected-entries",
							title: "Rejected Entries",
							type: "item",
							url: "/validator/entries/rejected-entries",
						},
					],
				},
				{
					id: "checkers",
					title: "Checkers",
					type: "item",
					url: "/validator/checkers",
					icon: "feather icon-layers",
				},
				{
					id: "vat-reports",
					title: "VAT Reports",
					type: "item",
					icon: "feather icon-file-text",
					url: "/validator/vat-reports",
				},
			],
		},
		// CLIENT USER
		{
			id: "navigation",
			title: "",
			type: "group",
			icon: "icon-navigation",
			userRole: 5,
			children: [
				{
					id: "dashboard",
					title: "Dashboard",
					type: "item",
					icon: "feather icon-home",
					url: "/dashboard",
				},
				{
					id: "upload-files",
					title: "Upload Files",
					type: "item",
					icon: "feather icon-layers",
					url: "/upload-files",
				},
				{
					id: "entries",
					title: "Entries",
					type: "collapse",
					icon: "feather icon-box",
					children: [
						{
							id: "pending-entries",
							title: "Pending Entries",
							type: "item",
							url: "/entries/pending-entries",
						},
						{
							id: "recent-entries",
							title: "Recent Entries",
							type: "item",
							url: "/entries/recent-entries",
						},
						{
							id: "approved-entries",
							title: "Approved Entries",
							type: "item",
							url: "/entries/approved-entries",
						},
						{
							id: "rejected-entries",
							title: "Rejected Entries",
							type: "item",
							url: "/entries/rejected-entries",
						},
						{
							id: "summary",
							title: "Entries Summary",
							type: "item",
							url: "/entries/summary",
						},
					],
				},
				{
					id: "vat-reports",
					title: "VAT Reports",
					type: "item",
					icon: "feather icon-file-text",
					url: "/vat-reports",
				},
				{
					id: "reports",
					title: "Reports",
					type: "collapse",
					icon: "feather icon-clipboard",
					children: [
						{
							id: "sales",
							title: "Sales",
							type: "item",
							url: "/reports/sales",
						},
						{
							id: "purchase",
							title: "Purchase",
							type: "item",
							url: "/reports/purchase",
						},
						{
							id: "expenditure",
							title: "Expenditure",
							type: "item",
							url: "/reports/expenditure",
						},
					],
				},
			],
		},
	],
};

export default menuItems;
