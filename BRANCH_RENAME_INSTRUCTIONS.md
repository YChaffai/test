# Branch Rename Instructions: master → main

## Overview
This document provides instructions for renaming the default branch from `master` to `main` in the repository.

## Important Note
Due to GitHub security restrictions, this operation cannot be completed entirely through automated tools. The following steps require manual intervention with appropriate GitHub credentials.

## Steps to Complete the Branch Rename

### 1. Local Branch Rename (Completed)
The local branch has been successfully renamed from `master` to `main` using:
```bash
git branch -m master main
```

### 2. Push the New Branch to Remote (Manual Action Required)
To push the new `main` branch to GitHub, execute:
```bash
git push -u origin main
```

This requires GitHub authentication credentials with push access to the repository.

### 3. Update Default Branch on GitHub (Manual Action Required)
After pushing the `main` branch, you need to update the default branch on GitHub:

1. Go to the repository on GitHub: https://github.com/YChaffai/test
2. Click on **Settings** (requires admin access)
3. Click on **Branches** in the left sidebar
4. Under "Default branch", click the switch icon next to the current default branch
5. Select `main` from the dropdown
6. Click **Update** and confirm the change

### 4. Delete the Old master Branch (Optional, Manual Action Required)
After confirming the `main` branch is working correctly and is set as the default:
```bash
git push origin --delete master
```

### 5. Update Local Tracking (Optional)
For any existing local clones, update them to track the new branch:
```bash
git branch --unset-upstream
git branch -u origin/main main
```

## Current Status
- ✅ Local branch renamed to `main`
- ⏳ Awaiting manual push to remote
- ⏳ Awaiting GitHub default branch update
- ⏳ Optional: Delete old `master` branch

## Notes
- All team members should update their local repositories after the branch is renamed
- CI/CD pipelines may need to be updated if they reference the `master` branch
- Protected branch rules will need to be recreated for the `main` branch
