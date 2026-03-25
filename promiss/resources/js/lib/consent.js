const CONSENT_STORAGE_KEY = 'promiss_cookie_consent_v1'

const DEFAULT_CONSENT = {
    necessary: true,
    analytics: false,
}

export function getDefaultConsent() {
    return { ...DEFAULT_CONSENT }
}

export function getStoredConsent() {
    try {
        const raw = localStorage.getItem(CONSENT_STORAGE_KEY)

        if (!raw) {
            return null
        }

        const parsed = JSON.parse(raw)

        return {
            necessary: true,
            analytics: Boolean(parsed.analytics),
            updatedAt: parsed.updatedAt || null,
        }
    } catch {
        return null
    }
}

export function saveConsent(consent) {
    const value = {
        necessary: true,
        analytics: Boolean(consent.analytics),
        updatedAt: new Date().toISOString(),
    }

    localStorage.setItem(CONSENT_STORAGE_KEY, JSON.stringify(value))

    return value
}

export function applyGoogleConsent(consent) {
    if (typeof window === 'undefined' || typeof window.gtag !== 'function') {
        return
    }

    const analyticsState = consent.analytics ? 'granted' : 'denied'

    window.gtag('consent', 'update', {
        analytics_storage: analyticsState,
        ad_storage: 'denied',
        ad_user_data: 'denied',
        ad_personalization: 'denied',
    })

    const measurementId = window.PROMISS_GA_MEASUREMENT_ID

    if (!measurementId || !consent.analytics) {
        return
    }

    if (!window.__PROMISS_GA_CONFIGURED__) {
        window.gtag('config', measurementId, {
            page_path: window.location.pathname,
        })
        window.__PROMISS_GA_CONFIGURED__ = true
    }
}
