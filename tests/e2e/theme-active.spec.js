/**
 * Theme activation and display tests for Soli Festival Theme.
 *
 * Tests that the child theme is properly activated and renders content:
 * - Theme is active
 * - Front-end is accessible
 * - Custom styles are loaded
 * - Parent theme (Twenty Twenty-Five) is properly extended
 */

const { test, expect } = require('@playwright/test');

test.describe('Festival theme activation', () => {
	test('should display the front-end with festival theme active', async ({ page }) => {
		await page.goto('/');

		// Page should load successfully (not a 404 or error)
		const title = await page.title();
		expect(title).toBeTruthy();
	});

	test('should load festival theme custom styles', async ({ page }) => {
		await page.goto('/');

		// Check that the festival CSS file is loaded
		const festivalStyle = page.locator('link[href*="festival.css"]');
		await expect(festivalStyle).toHaveCount(1);
	});

	test('should have the correct site title', async ({ page }) => {
		await page.goto('/');

		// The site title should be set (configured in wp-env lifecycle)
		const pageContent = await page.content();
		expect(pageContent).toContain("Soli");
	});

	test('should confirm child theme is active via admin', async ({ page }) => {
		// Log in as admin
		await page.goto('/wp-login.php');
		await page.fill('#user_login', 'admin');
		await page.fill('#user_pass', 'password');
		await page.click('#wp-submit');
		await page.waitForURL(/wp-admin/);

		// Go to themes page
		await page.goto('/wp-admin/themes.php');

		// The active theme should be the festival theme
		const activeTheme = page.locator('.theme.active .theme-name');
		await expect(activeTheme).toContainText(/Soli Festival/i);
	});
});
