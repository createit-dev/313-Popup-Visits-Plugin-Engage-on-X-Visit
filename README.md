# Popup Visits Plugin

This WordPress plugin allows you to display content in a popup on a user's X visit.

![1_Admin_Popup Visits Plugin Engage Your Visitors on Their X Visit.jpg](imgs%2F1_Admin_Popup%20Visits%20Plugin%20Engage%20Your%20Visitors%20on%20Their%20X%20Visit.jpg)

## Features

- Set the visit count to trigger the popup.
- Choose the popup display delay.
- Set the cookie lifetime for visit count.
- Embed shortcode, HTML, or plain text content for the popup.

## Installation

1. Upload the plugin files to the `/wp-content/plugins/popup-visits-plugin` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.

## Usage

1. Navigate to the **Popup Visits** settings page in the WordPress Dashboard ( `Wp-admin / Settings / Popup Visits` )
2. Set your preferred values for the trigger count, cookie lifetime, and display delay.
3. Input your desired content for the popup (supports shortcode, HTML, or plain text).
4. Save your settings.

## Dependencies

- [JS Cookie](https://github.com/js-cookie/js-cookie): For managing cookies.
- [Magnific Popup](https://github.com/dimsemenov/Magnific-Popup): For displaying the popup.


## Author

**createIT**  
[Website](https://www.createit.com)

## License

This project is licensed under the [MIT License](LICENSE) - see the LICENSE file for details.

## Changelog

**Version 1.0**
- Initial release.

---


## JavaScript Logic & Data Structure

### Displaying the Popup

The plugin employs a JavaScript algorithm to handle the popup display:

1. **Initial Setup**: On document ready, the script retrieves or initializes the visitor's cookie data.
2. **Visit Count**: For each visit, the script increments the `visitCount`.
3. **Popup Display Condition**: The script checks whether the `visitCount` is greater than or equal to the set trigger count (from the backend settings) and if the popup hasn't been shown before (`popupShown` flag).
4. **Delay & Display**: If the conditions are met, the script waits for the specified delay (converted to milliseconds) before displaying the popup using the Magnific Popup library.
5. **Update Flag**: After the popup is shown, the `popupShown` flag is set to `true` to prevent repeated displays.

### Storage Format & Data Structure

The plugin uses the JS Cookie library with a custom JSON converter to manage cookie data. The data structure in the cookie called `pvp_cookie_data` is as follows:

- `visitCount`: A numeric value representing the number of times a user has visited the website. For example: `5`.
- `popupShown`: A boolean flag indicating if the popup has been displayed to the user before. Possible values are `true` or `false`.

Example:
```javascript
{
    "visitCount": 5,
    "popupShown": true
}
```

## Use cases

Here are two configurations for different use cases:

### 1. New Visitor Engagement
This is for websites wanting to engage users early on, maybe offering a subscription or guiding new users. You don't want to interrupt their very first experience but engage them slightly after they start exploring.

- **Trigger on Page View**: 2 (This means the popup will be displayed on the user's second page visit.)
- **Cookie Lifetime**: 365 (Yearly reset.)
- **Popup show delay**: 10 (Allows the user 10 seconds to engage with the content before showing the popup.)

### 2. Periodic Promotions
This setup is for websites with periodic offers, ensuring that users see the promotion once during its duration, but not too often to be annoying.

- **Trigger on Page View**: 10 (Show it on their 10 visit within the promotion period.)
- **Cookie Lifetime**: 7 (A weekly reset ensures users see the promotion at least once a week.)
- **Popup show delay**: 5 (Quickly introduces the user to the promotion.)

---


## Examples

Once the plugin is activated, you can set content for your popup in the **Popup Visits** settings page in the WordPress Dashboard. Below are a few content scenarios:

### 1. Discount Offer

Promote discounts or special offers.

```html
<h1>Get discount for your next order</h1>
<p>Click the banner</p>
<img src="/wp-content/uploads/2023/black-friday-2946943_1280.jpg">
```

### 2. Donation Call-to-Action

Ask for donations using a donation plugin shortcode. GiveWP plugin modal implementation:

```html
<h1>Help good cause</h1>
[give_form id="694"]
```

![2_Frontend_Popup Visits Plugin Engage Your Visitors on Their X Visit.jpg](imgs%2F2_Frontend_Popup%20Visits%20Plugin%20Engage%20Your%20Visitors%20on%20Their%20X%20Visit.jpg)

### 3. Contact Form

Engage with visitors and let them contact you easily.

```html
<h1>Contact us</h1>
[contact-form-7 id="425" title="Contact form 1"]
```

![3_Contact_Form_Popup Visits Plugin Engage Your Visitors on Their X Visit.jpg](imgs%2F3_Contact_Form_Popup%20Visits%20Plugin%20Engage%20Your%20Visitors%20on%20Their%20X%20Visit.jpg)
 
