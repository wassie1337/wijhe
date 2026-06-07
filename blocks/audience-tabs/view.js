(() => {
	const activateTab = (block, nextIndex, focus = true) => {
		const tabs = Array.from(block.querySelectorAll('[role="tab"]'));
		const panels = Array.from(block.querySelectorAll('[role="tabpanel"]'));

		tabs.forEach((tab, index) => {
			const isActive = index === nextIndex;
			tab.setAttribute('aria-selected', String(isActive));
			tab.tabIndex = isActive ? 0 : -1;
			if (panels[index]) {
				panels[index].hidden = !isActive;
			}
		});

		if (focus && tabs[nextIndex]) {
			tabs[nextIndex].focus();
		}
	};

	const initTabs = (block) => {
		const tabs = Array.from(block.querySelectorAll('[role="tab"]'));

		tabs.forEach((tab, index) => {
			tab.addEventListener('click', () => activateTab(block, index, false));
			tab.addEventListener('keydown', (event) => {
				const current = tabs.indexOf(event.currentTarget);
				let next = current;

				if (event.key === 'ArrowRight' || event.key === 'ArrowDown') {
					next = (current + 1) % tabs.length;
				} else if (event.key === 'ArrowLeft' || event.key === 'ArrowUp') {
					next = (current - 1 + tabs.length) % tabs.length;
				} else if (event.key === 'Home') {
					next = 0;
				} else if (event.key === 'End') {
					next = tabs.length - 1;
				} else {
					return;
				}

				event.preventDefault();
				activateTab(block, next);
			});
		});
	};

	document.querySelectorAll('[data-wijhe-tabs]').forEach(initTabs);
})();
